import { Component, OnInit } from '@angular/core';
import { ItemService } from 'src/app/services/item.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-item',
  templateUrl: './item.component.html',
  styleUrls: ['./item.component.css']
})
export class ItemComponent implements OnInit {
  public item;

  constructor(private itemService: ItemService, private route: ActivatedRoute) { }

  ngOnInit() {
    this.getItem(this.route.snapshot.params.id);
  }

  getItem(id: number){
    this.itemService.getItem(id).subscribe(
      data => {
        this.item = data;
      },
      err => console.error(err)
    );
  }

  removeItem(){
    this.itemService.removeItem(this.route.snapshot.params.id).subscribe(
      data => {
        this.item = data;
      },
      err => console.error(err)
    );
    window.history.back();
  }


}
