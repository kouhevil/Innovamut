import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { MessageGeneriquePageRoutingModule } from './message-generique-routing.module';

import { MessageGeneriquePage } from './message-generique.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ReactiveFormsModule,
    MessageGeneriquePageRoutingModule
  ],
  declarations: [MessageGeneriquePage]
})
export class MessageGeneriquePageModule {}
