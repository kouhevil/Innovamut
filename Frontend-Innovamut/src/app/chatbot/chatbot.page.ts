import { Component, OnInit, Input } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-chatbot',
  templateUrl: './chatbot.page.html',
  styleUrls: ['./chatbot.page.scss'],
})
export class ChatbotPage implements OnInit {

  formulaireMessage: FormGroup;

  messages = [
    { text: "Bonjour", utilisateur: true },
    { text: "Bonjour", utilisateur: false },
    { text: "Comment vas tu ?", utilisateur:true },
    { text: "Bien et toi", utilisateur:false },
    { text: "Je vais bien", utilisateur:true },
    { text: "Et toi", utilisateur:false },   
    { text: "ok !", utilisateur:true },
  ];

  constructor(private formbuilder:FormBuilder) { }

  ngOnInit() {
    this.initialiserFormulaire();
  }

  initialiserFormulaire() {
    this.formulaireMessage = this.formbuilder.group({
      message: ['', Validators.required]
    });
  }

  envoyer() {
    const message = this.formulaireMessage.value['message'];
    console.log('Message envoyé !');
    console.log('Corps du message : '+ message);    
  }

}
