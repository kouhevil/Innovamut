import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-splashscreen',
  templateUrl: './splashscreen.page.html',
  styleUrls: ['./splashscreen.page.scss'],
})
export class SplashscreenPage implements OnInit {

  constructor(private router : Router) { 
    setTimeout(() => {
      console.log("Splashscreen ! ");
      this.router.navigateByUrl('/connexion');
    }, 3000);
  }

  ngOnInit() {
  }

}
