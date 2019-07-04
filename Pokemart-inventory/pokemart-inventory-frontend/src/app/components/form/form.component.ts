import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { ItemService } from 'src/app/services/item.service';
import { Observable } from 'rxjs';


@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {
  itemForm: FormGroup;
  validMessage = '';

  constructor(private itemService: ItemService) { }

  ngOnInit() {
    this.itemForm = new FormGroup({
      name: new FormControl('', Validators.required),
      modelNumber: new FormControl('', Validators.required),
      price: new FormControl('', Validators.required),
      specs: new FormControl('', Validators.required),
      stock: new FormControl('', Validators.required),
      image: new FormControl('', Validators.required),
      category: new FormControl('', Validators.required),
      description: new FormControl('', Validators.required)
    });
  }

  submitRegistration(){
    if(this.itemForm.valid){
      this.validMessage = "Item succesfully added to inventory";
      this.itemService.addItem(this.itemForm.value).subscribe(
        data => {
          this.itemForm.reset();
          return true;
        },
        error =>{
          return Observable.throw(error);
        }
      )
    } else{
      this.validMessage = "Error, form is not complete yet";
    }
  }


}
