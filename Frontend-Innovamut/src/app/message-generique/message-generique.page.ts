import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-message-generique',
  templateUrl: './message-generique.page.html',
  styleUrls: ['./message-generique.page.scss'],
})
export class MessageGeneriquePage implements OnInit {

  formulaireMessage: FormGroup;

  Regions = ['Normandie', 'Bretagne'];

  constructor(private formbuilder : FormBuilder) { }

  ngOnInit() {
    this.initialiserFormulaire();
  }

  initialiserFormulaire() {
    this.formulaireMessage = this.formbuilder.group({
      message: ['', Validators.required],
      tailleMin: ['', Validators.min(0)],
      tailleMax: ['', Validators.min(0)],
      poidsMin: ['', Validators.min(0)],
      poidsMax: ['', Validators.min(0)],
      ageMin: ['', Validators.min(0)],
      ageMax: ['', Validators.min(0)],
      genre: '',
      region: '',

    });
    
  }

  envoyer() {
    
  }

  public clear() {
    this.formulaireMessage.reset({ message:'', age: '', poids: '', taille: '', nom_medecin: '', genre:'', region:'' });
  }
}
