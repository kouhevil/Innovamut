import { Component } from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {

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
}
