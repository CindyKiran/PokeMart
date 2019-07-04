import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ItemService {
  
  constructor(private http: HttpClient) { }

  getItems(){
    return this.http.get('/server/inventory/items');
  }

  getItem(id: number){
    return  this.http.get('/server/inventory/items/'+ id);
  }

  addItem(item){
    let body = JSON.stringify(item);
    return this.http.post('/server/inventory/items', body, httpOption);
  }
}

//Needed for addItem method
const httpOption = {
  headers: new HttpHeaders({'Content-Type': 'application/json'})
};
