package com.CindyK.pokemartinventorybackend.repositories;

import com.CindyK.pokemartinventorybackend.models.Item;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ItemRepository extends JpaRepository <Item, Long>{
}
