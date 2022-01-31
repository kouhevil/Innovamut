import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { InfosComplementairesPage } from './infos-complementaires.page';

const routes: Routes = [
  {
    path: '',
    component: InfosComplementairesPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class InfosComplementairesPageRoutingModule {}
