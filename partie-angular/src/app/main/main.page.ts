import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-main',
  templateUrl: './main.page.html',
  styleUrls: ['./main.page.scss'],
})
export class MainPage implements OnInit {

  public appPages = [
    {
      title: 'Profil',
      url: '/profil',
      icon: 'person'
    },
    {
      title: 'Informations complémentaires',
      url: '/infos-complementaires',
      icon: 'document-text'
    },
    {
      title: 'Message générique',
      url: 'message-generique',
      icon: 'paper-plane'
    },
    {
      title: 'Chatbox',
      url: '/chatbot',
      icon: 'chatbox'
    },
    {
      title: 'Se déconnecter',
      url: '/deconnexion',
      icon: 'log-out'
    },
  ];


  constructor() { }

  ngOnInit() {
  }

}
