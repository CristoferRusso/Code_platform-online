//Quando la pagina è caricata eseguira la funzione 
/*
$(
    function() {

        //Salva il valore nel caso in cui viene premuto il pulsante Save(OPZIONALE)
     $('#diaryForm .btn').click(function(event) {
        //Evita l'azione di default del pulsante(invio form)
        event.preventDefault();
       
        
        });
    //Salva il diario ogni volta che viene inserito un valore nella textarea diary
    $('#diaryForm #diary').keyup(function(event) {
       // alert ('key');
        event.preventDefault();
       
        
        });
    }
);

//Salvataggio tramite ajax (Da rivedere)
/*
function saveDiary() {
    //prende il valore assegnato alla variabile diary
    const diary = $('#diary').val();

    $.post('diary.php',{diary, isAjax:1},function(result) {
        saveDiary();
        if(result!=1) {
      
         alert(result);
       }
   });-
}*/