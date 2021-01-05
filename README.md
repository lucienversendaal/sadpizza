<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About Sadpizza

Sadpizza is a very small project where the user can order a pizza. First when the user is registered and redirected to the empty dashboard. When pizzas are ordered the dashboard will show all ordered pizzas with the address, size, topping, date and status.

Please don't judge me about my bad designing skills :( My focus is on back end development. 

I've use as many as possible ways to show my skills. I've made use of:

- **Rules**
- **Validation Rules**
- **Mutator**

### Rules
In ```StorePizzaRequest.php``` I've added some rules, these rules are being check before it's saved in the database.
```
return [
    'address' => 'required',
    'size' => ['required', 'in:medium,large,extra-large'],
    'toppings'=> ['nullable', new IsValidTopping()],
    ];
```

### Validation Rules
In ```IsValidTopping.php``` I've created an array with all toppings that are passing the validation so, you can't do HTML manipulation and it checks if the value of the topping is matching the ones in the array.
```
new IsValidTopping()
public function passes($attribute, $value)
{
    $main = [
        'pepperoni',
        'extra-cheese',
        'mushrooms',
        'ground-beef',
        'pineapple'
    ];
    foreach($value as $val){
     if(in_array($val, $main)){
        return true;
        }
    }
}
```

### Mutator
In ```Pizza.php``` I've created a mutator. This is for data manipulation just before it's saved in the database.
```
public function setToppingsAttribute($value)
{
    if (!empty(request()->input('toppings'))){
        $this->attributes['toppings'] = implode(', ', $value);
    }else{
        $this->attributes['toppings'] = "no topping";
    }
}
```


# How to use
**Step 1: Create folder for the project and open your terminal**

**Step 2: Clone project in the created folder**
```git clone https://github.com/lucienversendaal/sadpizza.git```

**Step 3: Go to the folder where the file is installed**
```cd project-name```

**Step 4: Now install the composer**
```composer install```

**Step 5: Copy the .env.example file and rename it into the .env file (For this you can run the following command)**
```copy .env.example .env```

**Step 6: Run the following command to generate a new key**
```composer install```

**Step 7: Run the following command to generate a new key**
```php artisan key:generate```

**Final-step**
Now setup database and put in all details in your .env file
```
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password
```
