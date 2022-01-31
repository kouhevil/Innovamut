import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { MessageGeneriquePage } from './message-generique.page';

const routes: Routes = [
  {
    path: '',
    component: MessageGeneriquePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class MessageGeneriquePageRoutingModule {}
