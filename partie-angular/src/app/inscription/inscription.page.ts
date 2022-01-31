import { Component, Input, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-inscription',
  templateUrl: './inscription.page.html',
  styleUrls: ['./inscription.page.scss'],
})
export class InscriptionPage implements OnInit {

  formulaireInscription: FormGroup;
  @Input() client_matmut = false;

  constructor(public formBuilder: FormBuilder, private router: Router) { }

  ngOnInit() {

    this.initilaiserFormulaire();
  }

  private initilaiserFormulaire(): void {
    this.formulaireInscription = this.formBuilder.group({
      email : ['', [Validators.required, Validators.email]],
      confirmEmail : ['', [Validators.required, Validators.email]],
      motDePasse : ['', [Validators.required, Validators.minLength(8)]],
      confirmMotDePasse : ['', [Validators.required, Validators.minLength(8)]],
      nom : ['', [Validators.required, Validators.minLength(2)]],
      prenom: ['', Validators.required],
      numeroDeTelephone: ['', Validators.pattern('^[0-9]+$')],      
      id_matmut: '',
      notif_mail: '',
      notif_sms: '',
      notif_appli: ''
    });

  }

  sinscrire(): void {
    const formulaire = this.formulaireInscription.value;    
    console.log(formulaire);
  }

  seConnecter(): void {
    this.router.navigateByUrl('connexion');
  }

  setCLientMatmut(): void{
    if (this.client_matmut)
      this.client_matmut = false
    else
      this.client_matmut = true;
    
  }

}
