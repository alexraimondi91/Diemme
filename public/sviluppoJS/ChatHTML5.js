// JavaScript Document
//Required <link rel="stylesheet" href="dist/css/adminlte.min.css">
//Required <link rel="stylesheet" href="dist/css/adminlte.min.css">
//Required <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
//Required <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
//Required <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
var msg = {type: "sender", name:"Alessandro", surname:"Sallese", time:"00.00.00", text:"ciao",
           fullName : function() { return this.name + " " + this.surname; }};

class ChatHTML5 {
	constructor() {
		this.section = document.getElementById("chatHTML5");
        this.userId;
		this.section.appendChild(this.div.get());
		$().ajax(
		    action: "jasfjoiasf.it",
            data:
                this.div = new container(data);
        )
	}
}

class container {
	 constructor (data,userAuth) {
		this.cardTitle = new cardTitle("Prova").get();
		this.cardBody = new cardBody(data,userAuth).get();
		this.cardFooter = new cardFooter('diemmesport.it').get();
		this.container = document.createElement("div");
		this.container.className = 'container-fluid';
		this.card = document.createElement("div");
		this.card.className = "card direct-chat direct-chat-primary "
		//this.card.classList.add("direct-chat");
		//this.card.classList.add("direct-chat-primary");
		this.card.appendChild(this.cardTitle);
    this.card.appendChild(this.cardBody);
    this.card.appendChild(this.cardFooter);
    this.container.appendChild(this.card);
	}
	 get () { return this.container;}
}

/**********************************************+
 *
 * start title card with component
 */
class cardTitle{
	constructor (text) {
		this.title = document.createElement("h3");
        this.title.className = 'card-title';
		this.title.innerHTML = text;
		this.divContainer = document.createElement("div");
		this.divContainer.className= 'card-header';
    this.divContainer.appendChild(this.title);
	}
	 get(){return this.divContainer;}
}
/**********************************************+
 *
 * start body card with component
 */
class cardBody{
	constructor (data,userId) {
		this.cardBody = document.createElement("div");
		this.cardBody.className = "card-body";
		this.divContainer = document.createElement("div");
		this.divContainer.className= 'direct-chat-messages';
		this.divContainer.style = 'height: 400px';
        data.forEach(a =>
            {let message = new message(a);
             this.divContainer.appendChild(message,userId);
            }
        );
        this.cardBody.appendChild(this.divContainer);
	    }
	 get(){ return this.cardBody;  }
}
/**********************************************+
 *
 * start footer card with component
 */
class cardFooter{
  constructor(url) {
    this.container = document.createElement("div");
    this.container.className = 'card-footer';
    this.form = document.createElement("form");
    this.form.setAttribute('id',"chat");
    this.form.setAttribute('method',"post");
    this.form.setAttribute('enctype',"multipart/form-data")
    this.form.setAttribute('action',url);
    this.inputgroup = document.createElement("div");
    this.inputgroup.className = "input-group";
    this.input = document.createElement('input');
    this.input.className = "form-control";
    this.input.type = "text";
    this.input.name = "message";
    this.button = document.createElement('button');
    this.button.className = "btn btn-primary";
    this.button.type = "submit";
    this.button.innerHTML = "Send"
    this.inputgroup.appendChild(this.input);
    this.attach = new Attachment();
    this.inputgroup.appendChild(this.attach.get());
    this.inputgroup.appendChild(this.button);
    this.form.appendChild(this.inputgroup);
    this.container.appendChild(this.form);
  }
   get(){ return this.container;}
}
/**********************************************+
 *
 * start footer card with component
 */
class Attachment{
  constructor() {
    this.attachment = document.createElement("div");
    this.attachment.className = "btn btn-default btn-file";
    this.icon = document.createElement("i");
    this.icon.className = "fas fa-paperclip";
    this.input = document.createElement("input");
    this.input.type = "file";
    this.input.name = "attachment[]";
    this.attachment.appendChild(this.input);
    this.attachment.appendChild(this.icon);
  }
   get() { return this.attachment;}
}
/**********************************************+
 *
 * start message
 */
class message {
  constructor(msg,userAuth) {
    this.container = document.createElement("div");
    if (msg.id == userId)
      this.contaner.className = "direct-chat-msg right";
    else
      this.contaner.className = "direct-chat-msg";
    this.info = document.createElement("div");
    this.info.className = "direct-chat-infos clearfix";
    this.span1 = document.createElement("span");
    this.span1.className = "direct-chat-name float-left";
    this.span1.innerHTML = msg.name_user;
    this.span2 = document.createElement("span");
    this.span2.className = "direct-chat-timestamp float-right";
    this.span2.innerHTML = msg.time;
    this.icon = document.createElement('i');
    this.icon.className = 'direct-chat-img fa fa-user fa-2x';
    this.text = document.createElement('div');
    this.text.className = "direct-chat-text";
    this.innerHTML = msg.text;
    this.info.appendChild(this.span1);
    this.info.appendChild(this.span2);
    this.container.appendChild(this.info);
    this.container.appendChild(this.icon);
    this.contaner.appendChild(this.text);
  }
   get(){ return this.container;}
}


$('#chatHTML5').ready(new ChatHTML5(userAuth));
$( "#chat" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});
