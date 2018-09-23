PACKAGE_NAME = ppi
PACKAGE_COVERAGE = ppi

help:
	@echo "Options"
	@echo "-----------------------------------------------------------------------"
	@echo "help:                     This help"
	@echo "lock:                     Lock direct commits to master"
	@echo "update:                   Update branch to master"
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

lock:
	sh run_this.sh

