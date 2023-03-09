$(document).ready(function(){
    $('#employees').click(function(){
       $("#contenido").load("employees.php");
                                 });

    $('#providers').click(function(){
       $("#contenido").load("providers.php");
                                 });

      $('#reportsemployees').click(function(){
         $("#contenido").load("reportsemployees.php");
                                    });
                                    
});


function displayData(){
      var displayData="true";
      $.ajax({
         url:"display.php",
         type:"post",
         data:{
            displaysend: displayData
         },

         success:function(data,status){
            $('#displayDataTable').html(data);
         }
      })
}

function displayData1(){
   var displayData="true";
   $.ajax({
      url:"display1.php",
      type:"post",
      data:{
         displaysend: displayData
      },

      success:function(data,status){
         $('#displayDataTable1').html(data);
      }
   })
}


function addhours(){
   var nameemployee=$('#empleado').val();
   var start=$('#inicio').val();
   var end=$('#fin').val();
   var motivo=$('#motivo').val();

   if(nameemployee === "" || start === "" || end === "" ){
      alert("Por favor, complete todos los campos.");
      return false;
   }

   $.ajax({
      url: "insert.php",
      type: 'post',

      data:{
         namesend: nameemployee,
         startsend: start,
         endsend: end,
         motivosend: motivo
      },

      success:function(_data,status){
         $('#completeModal').modal('hide');
         displayData();
      }
   })
}

function addhoursv(){
   var pov=$('#pov').val();
   var start=$('#inicio').val();
   var end=$('#fin').val();

   $.ajax({
      url: "inserthoursv.php",
      type: 'post',

      data:{
         povsend: pov,
         startsend: start,
         endsend: end
      },
    

      success:function(_data,status){
         $('#complete').modal('hide');
         displayData1();
      }
   })
}


function addproviders(){
   var type=$('#type').val();
   var name=$('#name').val();
   var document=$('#document').val();

   $.ajax({
      url: "insertProviders.php",
      type: 'post',

      data:{
         typesend: type,
         namesend: name,
         documentsend: document
      },

      success:function(_data,status){
         $('#completeModalp').modal('hide');

         displayData1();
      }
   })
}

function getdetails(updateid){

   $('#hiddendata').val(updateid);

   
   $.post("update.php",{updateid:updateid},function(data,status){
      var userid=JSON.parse(data);
      console.log(userid);
      $('#updatetype').val(userid.type);
      $('#updatename').val(userid.name);
      $('#updatedocument').val(userid.document);

      
   });

   $('#updatem').modal('show');
   
}

function updateu(){
   var updatetype=$('#updatetype').val();
   var updatename=$('#updatename').val();
   var updatedocument=$('#updatedocument').val();
   var hiddendata=$('#hiddendata').val();

   $.post("update.php",{
      updatetype:updatetype,
      hiddendata:hiddendata,
      updatename:updatename,
      updatedocument:updatedocument
      
   },function(data,status){
      $('#updatem').modal('hide');
      displayData1();

   });

}

function deleteu(deleteid){
   $.ajax({
      url: "delete.php",
      type: 'post',
      data: {
         deletesend:deleteid
      },
      success: function(data,status){
       displayData1();
      }
   })
}

function validacion() {
   var fin = document.getElementById("fin").value; 
   var hora = fin.substring(11, 16); 
   if (hora < "16:00") { 
       document.getElementById("motivoDiv").style.display = "block"; 
   } else {
       document.getElementById("motivoDiv").style.display = "none";
   }
}
