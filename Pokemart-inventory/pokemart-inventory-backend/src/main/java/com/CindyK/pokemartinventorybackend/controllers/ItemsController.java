package com.CindyK.pokemartinventorybackend.controllers;

import com.CindyK.pokemartinventorybackend.models.Item;
import com.CindyK.pokemartinventorybackend.repositories.ItemRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;


import java.util.List;

@RestController
@RequestMapping("/inventory/items")
public class ItemsController {
    @Autowired
    private ItemRepository itemRepository;

    @GetMapping
    public List<Item> inventoryList(){
        return itemRepository.findAll();
    }

    @PostMapping
    @ResponseStatus(HttpStatus.OK)
    public void addItem(@RequestBody Item item){
        itemRepository.save(item);
    }

    @GetMapping("/{id}")
    public Item getItem(@PathVariable("id") long id){
        return itemRepository.getOne(id);
    }


}
