import { Directive, ElementRef } from '@angular/core';

@Directive({ selector: '[enviarCaracter]' })
export class Exercici1Directiva {
  constructor(el: ElementRef) {
    // https://blog.thoughtram.io/angular/2016/03/14/custom-validators-in-angular-2.html

    el.nativeElement.maxLength = 1;
    el.nativeElement.pattern = '[A-Za-z]';
  }
}
