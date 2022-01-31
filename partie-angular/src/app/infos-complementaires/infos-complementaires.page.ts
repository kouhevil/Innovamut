import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-infos-complementaires',
  templateUrl: './infos-complementaires.page.html',
  styleUrls: ['./infos-complementaires.page.scss'],
})
export class InfosComplementairesPage implements OnInit {

  formulaireInfo: FormGroup;

  Regions = ['Normandie', 'Bretagne'];

  constructor(private formbuilder: FormBuilder, private router: Router) {
    
   }

  ngOnInit() {
    this.initialiserFormulaire();
  }

  private initialiserFormulaire(): void{
    this.formulaireInfo = this.formbuilder.group({
      age: ['', Validators.min(0)],
      poids: ['', Validators.min(0)],
      taille: ['', Validators.min(0)],
      genre: '',
      region: '',
      nom_medecin: ['', Validators.minLength(4)],
      ville_medecin:['', Validators.minLength(1)]
    });
  }
  
  public enregistrer(): void {

  }

  public medecin() : boolean {
    return (this.formulaireInfo.value['nom_medecin'] != '') && !this.formulaireInfo.invalid;
  }

  public clear() {
    this.formulaireInfo.reset({ age: '', poids: '', taille: '', nom_medecin: '', genre:'', region:'' });
  }
}
