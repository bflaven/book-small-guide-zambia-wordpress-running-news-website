# make start
# Description: Start the containers for WP
start:
	docker-compose up -d --build

# make stop
# Description: Only stop the containers for WP
stop:
	docker-compose stop


# make down
# Description: Stop the containers and remove them
down:
	docker-compose down

# make ps
# Description: give a list of the containers for the WP
ps:
	docker-compose ps

# make cli
# Description: launch a console for WP-CLI
cli:
	docker-compose run --rm cli bash

# make clean
# Description: clean up the directory by removing the WP files
clean: stop
	@echo "💥 Removing Wordpress..."
	@rm -rf site
	@echo "💥 Removing Docker containers..."
	docker-compose rm -f

