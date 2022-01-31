import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { InfosComplementairesPageRoutingModule } from './infos-complementaires-routing.module';

import { InfosComplementairesPage } from './infos-complementaires.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    InfosComplementairesPageRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [InfosComplementairesPage]
})
export class InfosComplementairesPageModule {}
