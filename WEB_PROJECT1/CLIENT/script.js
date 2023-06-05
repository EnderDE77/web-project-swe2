const productElements = document.getElementsByClassName('item');
console.log(productElements);
var chosenProd = -1;
var chosenQuant = 0;

for(let i=0;i<productElements.length;i++){
    productElements[i].children[3].children[1].addEventListener('click', () =>{
        chosenQuant = parseInt(productElements[i].children[3].children[1].value);
        chosenProd = productElements[i].id;
        fetch('product.controller.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(
                {
                    chosenQuant: chosenQuant,
                    chosenProd: chosenProd
                }),
          })
            .then(response => response.text())
            .then(data => {
              console.log(data);
              // Handle the response from the server
            })
            .catch(error => {
              console.log(error);
              // Handle the error
            });
    });
}
