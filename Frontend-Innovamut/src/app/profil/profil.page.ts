import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-profil',
  templateUrl: './profil.page.html',
  styleUrls: ['./profil.page.scss'],
})
export class ProfilPage implements OnInit {

  formulaireProfil: FormGroup;

  constructor(private formBuilder : FormBuilder) { }

  ngOnInit() {
    this.initialiserFormulaire();
  }

  private initialiserFormulaire(): void {
    this.formulaireProfil = this.formBuilder.group({
      nouveauMotDePasse: ['',Validators.minLength(8)],
      confirmMotDePasse: ['',Validators.minLength(8)],
      numeroDeTelephone: ['', Validators.pattern('^[0-9]+$')],
      notif_mail: '',
      notif_sms: '',
      notif_appli: ''      
    });
  }

  enregistrer(): void{
    
  }
}
