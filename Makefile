clean:
	rm -rf api/var api/vendor ui/build ui/node_modules

create:
	docker-compose up --no-start

.PHONY: clean create
