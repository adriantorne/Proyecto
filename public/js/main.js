function buscar(){   
    let num_cols, display, input, mayusculas, tablaBody, tr, td, i, txtValue;   num_cols = 8;
     //Numero de fila en la que busca, la primera columna es la 0
    input = document.getElementById("buscador");
    //hace referencia al id del input del buscador 
    mayusculas = input.value.toUpperCase();
    //convierte a mayusculas   
    tablaBody = document.getElementById("tbody"); 
    //Hace referencia al id del tbody   
    tr = tablaBody.getElementsByTagName("tr");    
    for(i=0; i< tr.length; i++){ 
        //recorre todos los tr             
        display = "none";     
        for(j=0; j < num_cols; j++){ 
            //recorre las columnas hasta num_cols       
            td = tr[i].getElementsByTagName("td")[j]; 
            //devuelve la lista de elementos td       
            if(td){ txtValue = td.textContent || td.innerText; 
                //Puede ser textContent(Representa el contenido de texto) o innerText (tiene en cuenta el estilo y cambia el estilo de la página)        
                if(txtValue.toUpperCase().indexOf(mayusculas) > -1){
                    //Si el texto en mayusculas concuerda, lo muestra
                    display = "";
                }
            }
        }
        tr[i].style.display = display;
    }
   
}

 //Todos los elementos a los que les vamos a cambiar el fontSize
 const elementsList = document.getElementsByTagName('html');

 function getElementFontSize(element){
   //getComputedStyle nos devuelve las propiedades css de cada párrafo(elemento)
   const elementFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
   return parseFloat(elementFontSize);  //Devolvemos el total de pixeles
 }
 
 function cambiarTexto(operador) {
   for(let element of elementsList) {
      //Obtener el total de pixel de cada párrafo.
     const currentSize = getElementFontSize(element);
 
      //Restar o sumar, dependiendo del operador.
     const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
      //Aplicarle al parrafo actual el nuevo tamaño.
     element.style.fontSize = newFontSize
   }
 
 }
 function textoNormal(){
   location.reload()
 }