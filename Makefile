SHELL := /bin/bash

server-start:
	symfony server:start -d
	docker-compose up -d
	symfony run -d npm run watch
.PHONY: server-start

server-stop:
	symfony server:stop
	sudo docker-compose stop
.PHONY: server-stop