@extends('layout')

@section('cssPersonalizado')
<style type="text/css">
.chat-contenedor{
	height: 80.5vh;
}
.chat-padding{
	padding-left: 14px!important;
    padding-right: 14px!important;
}
.scrollspy-example {
  position: relative;
  height: 70vh;
  overflow-y: auto;
}
/*el chat*/
.mytext{
    border:0;padding:10px;background:whitesmoke;
}
.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
   text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    float:right;padding-left:10px;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:100%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:whitesmoke;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#e0e0de;
    height:70vh;
    overflow:hidden;
    padding:0;
}
.frame > div:last-of-type{
    position:absolute;bottom:0;width:100%;display:flex;
}
#span-icon{
    background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;
}
body > div > div > div.msj-rta.macro{
    margin:auto;margin-left:1%;
}
.flujo-mensaje {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:47px;
    display:flex;
    flex-direction: column;
    top:0;
    overflow-y:scroll;
}
.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}
.header-msg{
    /*position: absolute; 
    z-index: 1;*/
    height: 8vh;
}

/*hover de alumno*/
.list-group-item:focus, .list-group-item:hover {
    z-index: 1;
    text-decoration: none;
    background: #00dcffde;
}
</style>
@stop
@section('Titulo')
	<h1>Chat Escolar</h1>
@stop

@section('Subtitulo')
@stop

@section('ContenidoCasoUso')
<div class="row">
	<div class="col-5 scrollspy-example px-0" data-spy="scroll" data-target="#spy">
			@foreach ($alumnos as $a)
				<div class="list-group">
				  <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start btn-mensaje" data-id="{{ $a[0] }}" data-alumno="{{ $a[1] }}" data-tipo="{{ $a[3] }}">
				    <div class="d-flex w-100 justify-content-between">
				      <h5 class="mb-1">{{ $a[2] }}</h5>
				      <small>3 days ago</small>
				    </div>
				    <p class="mb-1">prueba</p>
				    <small>Donec id elit non mi porta.</small>
				  </a>
				</div>
			@endforeach
	</div>
	<!--<div class="col-7 scrollspy-example" data-spy="scroll" data-target="#spy">-->
        <!--<div class="col-7 bg-primary header-msg align-self-center">
                holasd
        </div>-->
		<div class="col-7 scrollspy-example frame" data-spy="scroll" data-target="#spy">
            <ul class="flujo-mensaje" id="contenedor-mensaje"></ul>
            <div class="mx-3 my-0 py-0">
                <div class="msj-rta macro">                        
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="mytext" placeholder="Type a message"/>
                    </div> 
                </div>
                <div style="padding:10px;">
                    <span id="span-icon" class="fa fa-paper-plane"></span>
                </div>                
            </div>
        </div>       
	<!--</div>-->
@stop
</div>
@section('scripts')
<script type="text/javascript" src={{ asset("js/Concurrent.Thread.js") }}></script>
<script type="text/javascript">
	var me = {};
me.avatar = "https://lh6.googleusercontent.com/-lr2nyjhhjXw/AAAAAAAAAAI/AAAAAAAARmE/MdtfUmC0M4s/photo.jpg?sz=48";

var you = {};
you.avatar = "https://a11.t26.net/taringa/avatares/9/1/2/F/7/8/Demon_King1/48x48_5C5.jpg";

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}            

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time){
    if (time === undefined){
        time = 0;
    }
    var control = "";
    var date = formatAMPM(new Date());
    
    if (who == "you"){
        control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';                    
    }else{
        control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+text+'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +                              
                  '</li>';
    }
    setTimeout(
        function(){                        
            $("#contenedor-mensaje").append(control).scrollTop($("#contenedor-mensaje").prop('scrollHeight'));
        }, time);
    
}

function resetChat(){
    $("#contenedor-mensaje").empty();
}

function enviarDatos(url, datos){
    //alert(Object.values(datos));
    //alert(url);
    $.post(url,datos, function(rsp_server){
        alert(rsp_server);
    }).fail(function(){

    });
}
var tipoR = 0;
var dst = 0;
var dst_alumno = 0;
var emisor = 0;
var url = "";
var sw = false;
$(".mytext").on("keydown", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertChat("me", text);
            var dato = {
                id : dst,
                id_alumno: dst_alumno,
                tipo : tipoR,
                mensaje : text,
                _token: "{{ csrf_token() }}"
            }
            enviarDatos("{{route('envioAndroid')}}", dato);
            $(this).val('');
        }
    }
});

$('#span-icon').click(function(){
    $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
})

//-- Clear Chat
resetChat();
//Recupera los datos
var urlOriginal = "{{ route('chatMensajeLeer',['Emisor'=> ':E','Receptor'=>':DST','tipoR'=>':TIPO']) }}";
var cpURL ="";
function TraerMensaje(){
        //var url = form.attr('action').replace(':USER_ID',id);
   if(sw){
        cpURL = urlOriginal;
        cpURL = cpURL.replace(':E',emisor);
        cpURL = cpURL.replace(':DST',dst);
        cpURL = cpURL.replace(':TIPO',tipoR);
        $.get(cpURL,function( data, estado){
            for(var item in data){
                if(!isNaN(item)){
                    insertChat("you", data[item].mensaje);
                }
            }
        });
   }
}

setInterval(TraerMensaje,2000);
//-- Print Messages
/*insertChat("me", "Hello Tom...", 0);  
insertChat("you", "Hi, Pablo", 1500);
insertChat("me", "What would you like to talk about today?", 3500);
insertChat("you", "Tell me a joke",7000);
insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
insertChat("you", "LOL", 12000);*/
$(window).on('load',function(){
    $('.btn-mensaje').click(function(){
        var a = $(this);
        dst = a.data('id');
        tipoR = a.data('tipo');
        dst_alumno = a.data('alumno');
        resetChat();//Eliminando todos los mensajes del chat
        emisor = {{ auth()->user()->personaId }}
        url = "{{ route('chatMensaje',['Emisor'=> ':E','Receptor'=>':DST','tipoR'=>':TIPO']) }}";
        //var url = form.attr('action').replace(':USER_ID',id);
        url = url.replace(':E',emisor);
        url = url.replace(':DST',dst);
        url = url.replace(':TIPO',tipoR);
        $.get(url,function( data, estado){
            //console.log(data);
            for(var item in data){
                //console.log(data[item].mensaje);
                if(!isNaN(item)){
                    if(data[item].pertenece == 1){
                    insertChat("me", data[item].mensaje);
                    }else{
                        insertChat("you", data[item].mensaje);
                    }
                } 
            }
        });
        sw = true;
    });
});


</script>
@stop