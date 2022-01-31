import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-connexion',
  templateUrl: './connexion.page.html',
  styleUrls: ['./connexion.page.scss'],
})
export class ConnexionPage implements OnInit {

  formulaireConnexion: FormGroup;

  constructor(private formBuilder:FormBuilder, private router:Router) { }

  ngOnInit(): void {
    //Called after the constructor, initializing input properties, and the first call to ngOnChanges.
    //Add 'implements OnInit' to the class.
    this.initialisationFormulaire();
  }

  /**
   * Méthode pour créer le formulaire
   */
  private initialisationFormulaire():void {
    this.formulaireConnexion = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      motDePasse: ['', Validators.required]
    });
  }

  seConnecter():void {
    //Récupération de la saisie de l'utilisateur
    const formulaire = this.formulaireConnexion.value;    
    const email = formulaire['email'];
    const motDePasse = formulaire['motDePasse'];
    console.log(formulaire);
    this.router.navigateByUrl('/folder/Inbox');
  }

  sinscrire():void {
    this.router.navigateByUrl('inscription');
  }
}
