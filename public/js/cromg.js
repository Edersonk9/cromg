$(document).ready(function(){  // success error info warning
  var tx = $("#testetoastr").attr('texto');
  var vl = $("#testetoastr").val();

  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  if(vl=="error" || vl=="success" || vl=="info" || vl=="warning"){
    toastr[vl](tx)
  }

  $("#cpf").mask("999.999.999-99");
});

function mascara(t, mask){
  var i = t.value.length;
  var saida = mask.substring(1,0);
  var texto = mask.substring(i)
  if (texto.substring(0,1) != saida){
    t.value += texto.substring(0,1);
  }
}

function Mudarestado(el) {
  var display = document.getElementById(el).style.display;
  $("#"+el).slideToggle(500);
  if(display == "none"){
    document.getElementById("btn-plus").innerHTML = "<i class='fa fa-list-ol' title='Abre lista'></i>";
    $("#div-cad-"+el).slideUp();
    $("#div-list-"+el).slideDown();
  }else{
    document.getElementById("btn-plus").innerHTML = "<i class='fa fa-pencil' title='Abre formulário'></i>";
    $("#div-cad-"+el).slideDown();
    $("#div-list-"+el).slideUp();
  }
}

function Mostra_form_table(el) {
  var display = document.getElementById("div-cad-"+el).style.display;
  // $("#"+el).slideToggle(500);
  if(display == "none"){
    document.getElementById("btn-plus").innerHTML = "<i class='fa fa-list-ol' title='Abre lista'></i>";
    $("#div-cad-"+el).slideDown();
    $("#div-list-"+el).slideUp();
  }else{
    document.getElementById("btn-plus").innerHTML = "<i class='fa fa-pencil' title='Abre formulário'></i>";
    $("#div-cad-"+el).slideUp();
    $("#div-list-"+el).slideDown();
  }
}

$(document).ready(function(){
  $(".divClose").hide();
  $(".divOpen").show();
});

function fMasc(objeto,mascara) {
  obj=objeto
  masc=mascara
  setTimeout("fMascEx()",1)
}
function fMascEx() {
  obj.value=masc(obj.value)
}
function mTel(tel) {
  tel=tel.replace(/\D/g,"")
  tel=tel.replace(/^(\d)/,"($1")
  tel=tel.replace(/(.{3})(\d)/,"$1)$2")
  if(tel.length == 9) {
    tel=tel.replace(/(.{1})$/,"-$1")
  } else if (tel.length == 10) {
    tel=tel.replace(/(.{2})$/,"-$1")
  } else if (tel.length == 11) {
    tel=tel.replace(/(.{3})$/,"-$1")
  } else if (tel.length == 12) {
    tel=tel.replace(/(.{4})$/,"-$1")
  } else if (tel.length > 12) {
    tel=tel.replace(/(.{4})$/,"-$1")
  }
  return tel;
}
function mCNPJ(cnpj){
  cnpj=cnpj.replace(/\D/g,"")
  cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
  cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
  cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
  cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
  return cnpj
}
function mCPF(cpf){
  cpf=cpf.replace(/\D/g,"")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
  return cpf
}
function mRG(rg){
  rg=rg.replace(/\D/g,"")
  rg=rg.replace(/^(\d{2})(\d)/,"$1.$2")
  rg=rg.replace(/\.(\d{3})(\d)/,".$1.$2")
  return rg
}
function mCEP(cep){
  cep=cep.replace(/\D/g,"")
  cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
  cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
  return cep
}
function mNum(num){
  num=num.replace(/\D/g,"")
  return num
}
