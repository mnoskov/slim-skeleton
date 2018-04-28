# Slim 3 framework simple app
Includes Twig, Eloquent, SwiftMailer and Console. Database migrations by Phinx.

Phinx commands:
```
./cli phinx:create <CamelCaseMigrationName>
./cli phinx:migrate
./cli phinx:rollback
./cli phinx:seed_create <CamelCaseSeedName>
./cli phinx:seed_run [-s <CamelCaseSeedName>]
...
```

Users commands:
```
./cli users:create <login> <password>
./cli users:delete <login>
```
