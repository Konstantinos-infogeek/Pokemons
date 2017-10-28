# PokeApp

An app which uses the pokemon api to declare a pokemon king.

## Important to Remember

- __Edit php.ini__<br/><br/>  set __max_execution_time__ and __max_input_time__ to _3600_ or generally a big number of seconds

- __Run the Laravel Installation__<br/><br/>
  ```
  bash composer install
  npm install
  npm run dev or npm run prod
  ```
                            

- __Second Step is taking a long time__<br/><br/>
If you have the __php.ini__ values already set. Second step will make around 940 http requests, __it ll take several minutes__, if you have the need to have an indication of this __actually working__, there is a commented Logger code line, just before start this step, just uncomment the __line 184 in Api\PokemonController__


 Click [Here](https://youtu.be/MGPjD8peGD0) to see a video presentation instead, to have a better grasp of the application</p>