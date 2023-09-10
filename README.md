# Sail alias
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'


# Bootstrap

cp .env.example .env

docker compose up -d

docker exec labottega.test composer install

# vendor/bin/sail up -d
vendor/bin/sail artisan key:generate
vendor/bin/sail artisan migrate
vendor/bin/sail artisan db:seed

vendor/bin/sail npm install
vendor/bin/sail npm run dev

# vendor/bin/sail artisan pest:install


# vendor/bin/sail composer require --dev laravel/dusk
# vendor/bin/sail artisan dusk:install


# https://github.com/tighten/duster
# composer require tightenco/duster --dev
# ./vendor/bin/duster github-actions

# ./vendor/bin/duster lint
# OR
# ./vendor/bin/duster fix
