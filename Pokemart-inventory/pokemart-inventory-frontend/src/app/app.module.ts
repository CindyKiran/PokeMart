import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ItemService } from './services/item.service';
import { HttpClientModule, HttpHeaders } from '@angular/common/http';
import { InventoryComponent } from './components/inventory/inventory.component';
import { FormComponent } from './components/form/form.component';
import { ReactiveFormsModule } from '@angular/forms';
import { ItemComponent } from './components/item/item.component';
import { GoBackComponent } from './components/go-back/go-back.component';

@NgModule({
  declarations: [
    AppComponent,
    InventoryComponent,
    FormComponent,
    ItemComponent,
    GoBackComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ReactiveFormsModule
  ],
  providers: [ItemService],
  bootstrap: [AppComponent]
})
export class AppModule { }
