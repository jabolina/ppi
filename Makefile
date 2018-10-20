PACKAGE_NAME = ppi
DATABASE_NAME = VJV_CLINIC

help:
	@echo "Options"
	@echo "-----------------------------------------------------------------------"
	@echo "help:                     This help"
	@echo "lock:                     Lock direct commits to master"
	@echo "update:                   Update branch to master"
	@echo "database:                 Create project database"
	@echo "-----------------------------------------------------------------------"

update:
	$(eval BRANCH=$(shell sh -c "git rev-parse --abbrev-ref HEAD"))
	@echo "Stashing changes for branch $(BRANCH)"
	git stash

	git checkout master
	git pull

	@echo "Checkout to $(BRANCH)"
	git checkout $(BRANCH)

	git merge master
	git stash apply

database:
	@echo "Database $(DATABASE_NAME) will be dropped and the created!!"
	cat database.sql | sudo mysql -u root -p

	@echo "If success, database created :)"

lock:
	sh run_this.sh

