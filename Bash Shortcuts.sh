



alias sf='bin/console'
alias cc='bin/console cache:clear'

alias show-about='bin/console about'
alias dump-completion='bin/console completion'
alias show-help='bin/console help'
alias list-commands='bin/console list'


alias dbmigration='bin/console make:migration'
alias dbmigrate='bin/console doctrine:migration:migrate'
alias dbcreate='bin/console doctrine:database:create'
alias dbdrop='bin/console doctrine:database:drop'
alias dbload='bin/console doctrine:fixtures:load'
alias dbquery='bin/console doctrine:query:sql'

alias schema-create='bin/console doctrine:schema:create'
alias schema-drop='bin/console doctrine:schema:drop'
alias schema-update='bin/console doctrine:schema:update'
alias schema-validate='bin/console doctrine:schema:validate'

alias sfassets='bin/console assets:install'
alias download-licenses='bin/console app:download-licenses'
alias dump-reference='bin/console config:dump-reference'
alias query-file='bin/console dbal:run-sql'
alias query='bin/console doctrine:query:sql'


alias mapping-import='bin/console doctrine:mapping:import'
alias migrations-current='bin/console doctrine:migrations:current'
alias migrations-diff='bin/console doctrine:migrations:diff'
alias migrations-dump-schema='bin/console doctrine:migrations:dump-schema'
alias migrations-execute='bin/console doctrine:migrations:execute'
alias migrations-generate='bin/console doctrine:migrations:generate'
alias migrations-latest='bin/console doctrine:migrations:latest'
alias migrations-list='bin/console doctrine:migrations:list'
alias migrations-migrate='bin/console doctrine:migrations:migrate'
alias migrations-rollup='bin/console doctrine:migrations:rollup'
alias migrations-status='bin/console doctrine:migrations:status'
alias migrations-sync-metadata-storage='bin/console doctrine:migrations:sync-metadata-storage'
alias migrations-up-to-date='bin/console doctrine:migrations:up-to-date'
alias migrations-version='bin/console doctrine:migrations:version'
alias reset-password='bin/console make:reset-password'
alias hash-password='bin/console security:hash-password'
alias dump-workflow='bin/console workflow:dump'





#assets
alias assets-install='bin/console assets:install'
#cache
alias cache-clear='bin/console cache:clear'
alias cache-pool-clear='bin/console cache:pool:clear'
alias cache-pool-delete='bin/console cache:pool:delete'
alias cache-pool-list='bin/console cache:pool:list'
alias cache-pool-prune='bin/console cache:pool:prune'
alias cache-warmup='bin/console cache:warmup'
#config
alias config-dump-reference='bin/console config:dump-reference'
#dbal
alias dbal-run-sql='bin/console dbal:run-sql'
#debug
alias debug-autowiring='bin/console debug:autowiring'
alias debug-config='bin/console debug:config'
alias debug-container='bin/console debug:container'
alias debug-dotenv='bin/console debug:dotenv'
alias debug-event-dispatcher='bin/console debug:event-dispatcher'
alias debug-firewall='bin/console debug:firewall'
alias debug-form='bin/console debug:form'
alias debug-messenger='bin/console debug:messenger'
alias debug-router='bin/console debug:router'
alias debug-translation='bin/console debug:translation'
alias debug-twig='bin/console debug:twig'
alias debug-validator='bin/console debug:validator'
#doctrine
alias doctrine-cache-clear-collection-region='bin/console doctrine:cache:clear-collection-region'
alias doctrine-cache-clear-entity-region='bin/console doctrine:cache:clear-entity-region'
alias doctrine-cache-clear-metadata='bin/console doctrine:cache:clear-metadata'
alias doctrine-cache-clear-query='bin/console doctrine:cache:clear-query'
alias doctrine-cache-clear-query-region='bin/console doctrine:cache:clear-query-region'
alias doctrine-cache-clear-result='bin/console doctrine:cache:clear-result'
alias doctrine-database-create='bin/console doctrine:database:create'
alias doctrine-database-drop='bin/console doctrine:database:drop'
alias doctrine-ensure-production-settings='bin/console doctrine:ensure-production-settings'
alias doctrine-fixtures-load='bin/console doctrine:fixtures:load'
alias doctrine-mapping-convert='bin/console doctrine:mapping:convert'
alias doctrine-mapping-import='bin/console doctrine:mapping:import'
alias doctrine-migrations-current='bin/console doctrine:migrations:current'
alias doctrine-migrations-diff='bin/console doctrine:migrations:diff'
alias doctrine-migrations-dump-schema='bin/console doctrine:migrations:dump-schema'
alias doctrine-migrations-execute='bin/console doctrine:migrations:execute'
alias doctrine-migrations-generate='bin/console doctrine:migrations:generate'
alias doctrine-migrations-latest='bin/console doctrine:migrations:latest'
alias doctrine-migrations-list='bin/console doctrine:migrations:list'
alias doctrine-migrations-migrate='bin/console doctrine:migrations:migrate'
alias doctrine-migrations-rollup='bin/console doctrine:migrations:rollup'
alias doctrine-migrations-status='bin/console doctrine:migrations:status'
alias doctrine-migrations-sync-metadata-storage='bin/console doctrine:migrations:sync-metadata-storage'
alias doctrine-migrations-up-to-date='bin/console doctrine:migrations:up-to-date'
alias doctrine-migrations-version='bin/console doctrine:migrations:version'
alias doctrine-query-dql='bin/console doctrine:query:dql'
alias doctrine-query-sql='bin/console doctrine:query:sql'
alias doctrine-schema-create='bin/console doctrine:schema:create'
alias doctrine-schema-drop='bin/console doctrine:schema:drop'
alias doctrine-schema-update='bin/console doctrine:schema:update'
alias doctrine-schema-validate='bin/console doctrine:schema:validate'
#lint
alias lint-container='bin/console lint:container'
alias lint-twig='bin/console lint:twig'
alias lint-xliff='bin/console lint:xliff'
alias lint-yaml='bin/console lint:yaml'
#make
alias make-auth='bin/console make:auth'
alias make-command='bin/console make:command'
alias make-controller='bin/console make:controller'
alias make-crud='bin/console make:crud'
alias make-docker-database='bin/console make:docker:database'
alias make-entity='bin/console make:entity'
alias make-factory='bin/console make:factory'
alias make-fixtures='bin/console make:fixtures'
alias make-form='bin/console make:form'
alias make-message='bin/console make:message'
alias make-messenger-middleware='bin/console make:messenger-middleware'
alias make-migration='bin/console make:migration'
alias make-registration-form='bin/console make:registration-form'
alias make-reset-password='bin/console make:reset-password'
alias make-serializer-encoder='bin/console make:serializer:encoder'
alias make-serializer-normalizer='bin/console make:serializer:normalizer'
alias make-story='bin/console make:story'
alias make-subscriber='bin/console make:subscriber'
alias make-test='bin/console make:test'
alias make-twig-extension='bin/console make:twig-extension'
alias make-user='bin/console make:user'
alias make-validator='bin/console make:validator'
alias make-voter='bin/console make:voter'
#messenger
alias messenger-consume='bin/console messenger:consume'
alias messenger-failed-remove='bin/console messenger:failed:remove'
alias messenger-failed-retry='bin/console messenger:failed:retry'
alias messenger-failed-show='bin/console messenger:failed:show'
alias messenger-setup-transports='bin/console messenger:setup-transports'
alias messenger-stop-workers='bin/console messenger:stop-workers'
#reset-password
alias reset-password-remove-expired='bin/console reset-password:remove-expired'
#router
alias router-match='bin/console router:match'
#secrets
alias secrets-decrypt-to-local='bin/console secrets:decrypt-to-local'
alias secrets-encrypt-from-local='bin/console secrets:encrypt-from-local'
alias secrets-generate-keys='bin/console secrets:generate-keys'
alias secrets-list='bin/console secrets:list'
alias secrets-remove='bin/console secrets:remove'
alias secrets-set='bin/console secrets:set'
#security
alias security-hash-password='bin/console security:hash-password'
#server
alias server-dump='bin/console server:dump'
alias server-log='bin/console server:log'
#translation
alias translation-extract='bin/console translation:extract'
alias translation-pull='bin/console translation:pull'
alias translation-push='bin/console translation:push'
#workflow
alias workflow-dump='bin/console workflow:dump'















#-------------------------------------------------------------
# The 'ls' family (this assumes you use a recent GNU ls).
#-------------------------------------------------------------
# Add colors for filetype and  human-readable sizes by default on 'ls':
alias lx='ls -lXB'         #  Sort by extension.
alias lk='ls -lSr'         #  Sort by size, biggest last.
alias lt='ls -ltr'         #  Sort by date, most recent last.
alias lc='ls -ltcr'        #  Sort by/show change time,most recent last.
alias lu='ls -ltur'        #  Sort by/show access time,most recent last.

# The ubiquitous 'll': directories first, with alphanumeric sorting:
alias ll="ls -lv --group-directories-first"
alias lm='ll |more'        #  Pipe through 'more'
alias lr='ll -R'           #  Recursive ls.
alias tree='tree -Csuh'    #  Nice alternative to 'recursive ls' ...



#	Create parent directories on demand
alias mkdir='mkdir -pv'

#19: Tune sudo and su
alias root='sudo su -'
alias su='sudo -i'

# handy short cuts #
alias h='history'
alias j='jobs -l'
alias c='clear'





alias vim='vim -u /etc/bashrc-devilbox.d/vimrc'

alias c='clear'

#	LOCATION ALIASES
alias www='cd /shared/httpd'
alias person='cd /shared/httpd.person.iguntrust'



alias df='df -h'
alias du='du -h'
alias less='less -r'                          # raw control characters
alias whence='type -a'                        # where, of a sort
alias grep='grep --color'                     # show differences in colour
alias egrep='egrep --color=auto'              # show differences in colour
alias fgrep='fgrep --color=auto'              # show differences in colour




#	DIRECTORY SHIT
alias dir='ls --color=auto --format=vertical'
alias ls='ls -lah --color=auto --format=long'
alias la='ls -A'                              # all but . and ..
alias l='ls -CF'                              #
alias ll='ls -la --color=auto'
alias l.='ls -d .* --color=auto'			# include hidden files.
alias ls='ls -lAsahAxF --block-size=M --color=auto --format=long --group-directories-first'

alias ..='cd ..'
alias ...='cd ../../../'
alias ....='cd ../../../../'
alias .....='cd ../../../../'
alias .4='cd ../../../../'
alias .5='cd ../../../../..'

#	SYMFONY SHIT

# Assets
alias assets-install='bin/console assets:install'                   #Installs bundles web assets under a public directory
# Cache
alias cache-clear='bin/console cache:clear'                         #Clears the cache
alias cache-pool-clear='bin/console cache:pool:clear'               #Clears cache pools
alias cache-pool-delete='bin/console cache:pool:delete'             #Deletes an item from a cache pool
alias cache-pool-list='bin/console cache:pool:list'                 #List available cache pools
alias cache-pool-prune='bin/console cache:pool:prune'               #Prunes cache pools
alias cache-warmup='bin/console cache:warmup'                       #Warms up an empty cache
# Config
alias config-dump-reference='bin/console config:dump-reference'      #Dumps the default configuration for an extension
# Debug
alias debug-autowiring='bin/console debug:autowiring'                #Lists classes/interfaces you can use for autowiring
alias debug-config='bin/console debug:config'                        #Dumps the current configuration for an extension
alias debug-container='bin/console debug:container'                  #Displays current services for an application
alias debug-parameters='bin/console debug:container --parameters'    #Displays current services for an application
alias debug-event-dispatcher='bin/console debug:event-dispatcher'    #Displays configured listeners for an application
alias debug-form='bin/console debug:form'                            #Displays form type information
alias debug-router='bin/console debug:router'                        #Displays current routes for an application
alias debug-swiftmailer='bin/console debug:swiftmailer'              #Displays current mailers for an application
alias debug-translation='bin/console debug:translation'              #Displays translation messages information
alias debug-twig='bin/console debug:twig'                            #Shows a list of twig functions, filters, globals and tests


# Doctrine
alias doctrine-cache-clear-collection-region='bin/console doctrine:cache:clear-collection-region'       #Clear a second-level cache collection region
alias doctrine-cache-clear-entity-region='bin/console doctrine:cache:clear-entity-region'               #Clear a second-level cache entity region
alias doctrine-cache-clear-metadata='bin/console doctrine:cache:clear-metadata'                         #Clears all metadata cache for an entity manager
alias doctrine-cache-clear-query='bin/console doctrine:cache:clear-query'                               #Clears all query cache for an entity manager
alias doctrine-cache-clear-query-region='bin/console doctrine:cache:clear-query-region'                 #Clear a second-level cache query region
alias doctrine-cache-clear-result='bin/console doctrine:cache:clear-result'                             #Clears result cache for an entity manager
alias doctrine-cache-contains='bin/console doctrine:cache:contains'                                     #Check if a cache entry exists
alias doctrine-cache-delete='bin/console doctrine:cache:delete'                                         #Delete a cache entry
alias doctrine-cache-flush='bin/console doctrine:cache:flush'                                           #[doctrine:cache:clear] Flush a given cache
alias doctrine-cache-stats='bin/console doctrine:cache:stats'                                           #Get stats on a given cache provider
alias doctrine-database-create='bin/console doctrine:database:create'                                   #Creates the configured database
alias doctrine-database-drop='bin/console doctrine:database:drop'                                       #Drops the configured database
alias doctrine-database-import='bin/console doctrine:database:import'                                   #Import SQL file(s) directly to Database.
alias doctrine-ensure-production-settings='bin/console doctrine:ensure-production-settings'             #Verify that Doctrine is properly configured for a production environment
alias doctrine-fixtures-load='bin/console doctrine:fixtures:load --append'                              #Load data fixtures to your database
alias doctrine-generate-entities='bin/console doctrine:generate:entities'                               #[generate:doctrine:entities] Generates entity classes and method stubs from your mapping information
alias doctrine-mapping-convert='bin/console doctrine:mapping:convert'                                   #[orm:convert:mapping] Convert mapping information between supported formats
alias doctrine-mapping-import='bin/console doctrine:mapping:import'                                     #Imports mapping information from an existing database
alias doctrine-mapping-info='bin/console doctrine:mapping:info'                                         #
alias doctrine-migrations-diff='bin/console doctrine:migrations:diff'                                   #[diff] Generate a migration by comparing your current database to your mapping information.
alias doctrine-migrations-dump-schema='bin/console doctrine:migrations:dump-schema'                     #[dump-schema] Dump the schema for your database to a migration.
alias doctrine-migrations-execute='bin/console doctrine:migrations:execute'                             #[execute] Execute a single migration version up or down manually.
alias doctrine-migrations-generate='bin/console doctrine:migrations:generate'                           #[generate] Generate a blank migration class.
alias doctrine-migrations-latest='bin/console doctrine:migrations:latest'                               #[latest] Outputs the latest version number
alias doctrine-migrations-migrate='bin/console doctrine:migrations:migrate'                             #[migrate] Execute a migration to a specified version or the latest available version.
alias doctrine-migrations-rollup='bin/console doctrine:migrations:rollup'                               #[rollup] Rollup migrations by deleting all tracked versions and insert the one version that exists.
alias doctrine-migrations-status='bin/console doctrine:migrations:status'                               #[status] View the status of a set of migrations.
alias doctrine-migrations-up-to-date='bin/console doctrine:migrations:up-to-date'                       #[up-to-date] Tells you if your schema is up-to-date.
alias doctrine-migrations-version='bin/console doctrine:migrations:version'                             #[version] Manually add and delete migration versions from the version table.
alias doctrine-query-dql='bin/console doctrine:query:dql'                                               #Executes arbitrary DQL directly from the command line
alias doctrine-query-sql='bin/console doctrine:query:sql'                                               #Executes arbitrary SQL directly from the command line.
alias doctrine-schema-create='bin/console doctrine:schema:create'                                       #Executes (or dumps) the SQL needed to generate the database schema
alias doctrine-schema-drop='bin/console doctrine:schema:drop'                                           #Executes (or dumps) the SQL needed to drop the current database schema
alias doctrine-schema-update='bin/console doctrine:schema:update'                                       #Executes (or dumps) the SQL needed to update the database schema to match the current mapping metadata
alias doctrine-schema-validate='bin/console doctrine:schema:validate'                                   #Validate the mapping files
# Lint
alias lint-twig='bin/console lint:twig'                                     #Lints a template and outputs encountered errors
alias lint-xliff='bin/console lint:xliff'                                   #Lints a XLIFF file and outputs encountered errors
alias lint-yaml='bin/console lint:yaml'                                     #Lints a file and outputs encountered errors
# Make
alias make-auth='bin/console make:auth'                                     #Creates a Guard authenticator of different flavors
alias make-command='bin/console make:command'                               #Creates a new console command class
alias make-controller='bin/console make:controller'                         #Creates a new controller class
alias make-crud='bin/console make:crud'                                     #Creates CRUD for Doctrine entity class
alias make-entity='bin/console make:entity'                                 #Creates or updates a Doctrine entity class, and optionally an API Platform resource
alias make-fixtures='bin/console make:fixtures'                             #Creates a new class to load Doctrine fixtures
alias make-form='bin/console make:form'                                     #Creates a new form class
alias make-functional-test='bin/console make:functional-test'               #Creates a new functional test class
alias make-migration='bin/console make:migration'                           #Creates a new migration based on database changes
alias make-registration-form='bin/console make:registration-form'           #Creates a new registration form system
alias make-serializer-encoder='bin/console make:serializer:encoder'         #Creates a new serializer encoder class
alias make-serializer-normalizer='bin/console make:serializer:normalizer'   #Creates a new serializer normalizer class
alias make-subscriber='bin/console make:subscriber'                         #Creates a new event subscriber class
alias make-twig-extension='bin/console make:twig-extension'                 #Creates a new Twig extension class
alias make-unit-test='bin/console make:unit-test'                           #Creates a new unit test class
alias make-user='bin/console make:user'                                     #Creates a new security user class
alias make-validator='bin/console make:validator'                           #Creates a new validator and constraint class
alias make-voter='bin/console make:voter'                                   #Creates a new security voter class
# Router
alias router-match='bin/console router:match'                               #Helps debug routes by simulating a path info match
# Security
alias security-encode-password='bin/console security:encode-password'       #Encodes a password.
# Server
alias server-dump='bin/console server:dump'                                 #Starts a dump server that collects and displays dumps in a single place
alias server-log='bin/console server:log'                                   #Starts a log server that displays logs in real time
alias server-run='bin/console server:run'                                   #Runs a local web server
alias server-start='bin/console server:start'                               #Starts a local web server in the background
alias server-status='bin/console server:status'                             #Outputs the status of the local web server
alias server-stop='bin/console server:stop'                                 #Stops the local web server that was started with the server:start command
# Swiftmailer
alias swiftmailer-email-send='bin/console swiftmailer:email:send'           #Send simple email message
alias swiftmailer-spool-send='bin/console swiftmailer:spool:send'           #Sends emails from the spool



# Translation
alias translation-update='bin/console translation:update'                   #Updates the translation file
alias l='ls -a'
alias ll='ls -al'
alias lll='ls -lah'


alias gc='git commit -a'
alias gs='git status'

alias fix-permissions='sudo chown -hR devilbox:devilbox ./ && sudo find ./ -type d -exec chmod u+rwx {} + && sudo find ./ -type f -exec chmod u+rw {} +'



# Aliases for Docker and Local Windows Bash End Here. 

#	GREP Shit
## Colorize the grep command output for ease of use (good for log files)##
alias grep='grep --color=auto'
alias egrep='egrep --color=auto'
alias fgrep='fgrep --color=auto'


# mv ~/.bash-aliases ~/.bash_aliases



#	Drush installation.
#alias drush='/mnt/c/Users/Tom\ Olson/AppData/Roaming/Composer/vendor/drush/drush/drush'
#alias drush='/mnt/c/Users/Tom\ Olson/AppData/Roaming/Composer/vendor/drush/drush/drush'
#alias drush='php drush.phar'




#	NPM SHIT
#alias node="/mnt/c/Program\ Files/nodejs/node.exe"
#alias npm="cmd /c npm"

#alias npm='/mnt/c/Program\ Files/nodejs/npm'



#	Docker SHIT
#alias dockerup='docker-compose up bind httpd php redis'
#alias dockerdown='docker-compose down'
#alias dockerremove='docker-compose rm -f'

#alias =''
#alias =''
#alias =''
#alias =''




















