d-build:
	docker compose build

d-up:
	docker compose up -d

d-down:
	docker compose down

d-restart:
	docker compose restart

d-ps:
	docker compose ps

d-bash:
	docker exec -it investigation-ddd-back bash
