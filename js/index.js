   //   $("#inicio").removeClass('d-none');

$(window).load(function(){
  $("a[href='#detroturma']").click(()=>{
    alert("Ola")
  })
})



   /*   $("a[href='#inicio']").click(()=>{
  $("main").addClass('d-none');
    $("#inicio").removeClass('d-none');
    $("#guard").addClass('d-none');
    $("#ponto").addClass('d-none');
  $("a[href='#ponto']").removeClass('active');
    $("a[href='#guard']").removeClass('active');
    $("a[href='#inicio']").addClass('active');
    $("a[href='#plano']").removeClass('active');
    if(window.innerWidth <= 767){
     // alert("Ola")
     $("#sidebarMenu").toggleClass('show');
    }
})
$("a[href='#plano']").click(()=>{
  $("main").addClass('d-none');
  $("#plano").removeClass('d-none');
  $("#guard").addClass('d-none');
  $("#ponto").addClass('d-none');
  $("a[href='#ponto']").removeClass('active');
  $("a[href='#guard']").removeClass('active');
  $("a[href='#plano']").addClass('active');
  $("a[href='#inicio']").removeClass('active');
  if(window.innerWidth <= 767){
    // alert("Ola")
    $("#sidebarMenu").toggleClass('show');
   }
})

$("a[href='#guard']").click(()=>{
 // alert('Ola')
  $("main").addClass('d-none');
  $("#plano").addClass('d-none');
  $("#guard").removeClass('d-none');
  $("#ponto").addClass('d-none');
  $("a[href='#ponto']").removeClass('active');
  $("a[href='#guard']").addClass('active');
  $("a[href='#plano']").removeClass('active');
  $("a[href='#inicio']").removeClass('active');
  if(window.innerWidth <= 767){
    // alert("Ola")
    $("#sidebarMenu").toggleClass('show');
   } 
})

$("a[href='#ponto']").click(()=>{
 // alert('Ola')
  $("main").addClass('d-none');
  $("#plano").addClass('d-none');
  $("#guard").addClass('d-none');
  $("#ponto").removeClass('d-none');
  $("a[href='#ponto']").addClass('active');
  $("a[href='#guard']").removeClass('active');
  $("a[href='#plano']").removeClass('active');
  $("a[href='#inicio']").removeClass('active');
  if(window.innerWidth <= 767){
    // alert("Ola")
    $("#sidebarMenu").toggleClass('show');
   } 
})
$("#inicio a").click(()=>{
  $("main").addClass('d-none');
  $("#turma").removeClass('d-none');
})

$("#inserNota").click(()=>{
  $("#turma table").addClass('d-none');
  $("#addnota").removeClass('d-none');
})
$("#verNota").click(()=>{
  $("#turma table").addClass('d-none');
  $("#vernota").removeClass('d-none');
})
$("a[href='#dropdown-toggle']").click(()=>{
    $("#dropdown-menu").toggleClass('d-none');  
})

$("#verNota1").click(()=>{
 // alert("Ola")
 $("#planoAula :input").val("");
})

