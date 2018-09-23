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
	branch = git rev-parse --abbrev-ref HEAD

	@echo "Stashing your changes"
	git stash
	git checkout master

	@echo "Changing to master"
	git pull
	git checkout $(branch)

	@echo "Merging master into ${branch}"
	git merge master

	@echo "Applying stashed differences"
	git stash apply

lock:
	sh run_this.sh

