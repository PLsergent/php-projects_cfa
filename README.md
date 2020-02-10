# php-projects_cfa
First two php projects for cfa formation.

## Prerequisite
- docker
- docker-compose

## Usage

### Launch app

Clone the project.
```
git clone https://github.com/PLsergent/php-projects_cfa.git
```

Navigate either to blog or planning and then launch the corresponding app (the two apps are launched separately):<br>
*You may have to use sudo.*

```
docker-compose build
docker-compose up
```

App running,<br>
blog: http://localhost:8000/index.php<br>
planning : http://localhost:8000


**Make sure to stop the docker-compose before launching the other app.**

**You may have to refresh the page using `Ctrl+Shift+R` to load static files.**

### Acces mongodb

In an other terminal:
```
docker ps
```

Spot the container_id of the container named `mongo:lastest`.

Then use:
```
docker exec -it <container_id> bash
```

Now you can access the database:
```
mongo
use blog/planning
...
```
