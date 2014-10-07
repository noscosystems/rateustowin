<?php

    class m130807_182717_branch_table extends CDbMigration
    {

        /**
         * Migrate: Up
         *
         * @access public
         * @return void
         */
        public function up()
        {
            $this->createTable(
                '{{branches}}',
                array(
                    // Entities.
                    'id'            => 'pk                                          COMMENT "The automatic, machine-readable identifier (integer) for a branch represented in this table."',
                    'name'          => 'VARCHAR(30)     NOT NULL                    COMMENT "Name the branch is known by."',
                    'company'       => 'VARCHAR(64)         NULL                    COMMENT "Not unique as a company my run more than on branch."',
                    'address'       => 'VARCHAR(255)    NOT NULL                    COMMENT "Full address."',
                    'county'        => 'VARCHAR(64)         NULL',
                    'phoneNum'      => 'VARCHAR(11)     NOT NULL',
                    'town'          => 'VARCHAR(64)     NOT NULL',
                    'postcode'      => 'VARCHAR(8)          NULL                    COMMENT "Postcode in capitals (no space) UK only - could be ZIP in US."',
                    'email'         => 'VARCHAR(255)    NOT NULL                    COMMENT ""',
                    'organisationId'=> 'INT(11)         NOT NULL',
                    'active'        => 'BOOLEAN         NOT NULL    DEFAULT TRUE    COMMENT "A boolean flag as to whether the user is active within the system (switch to false to ban the user from logging in)."',
                ),
                implode(' ', array(
                    'ENGINE          = InnoDB',
                    'DEFAULT CHARSET = utf8',
                    'COLLATE         = utf8_general_ci',
                    'COMMENT         = "Base branch table."',
                    'AUTO_INCREMENT  = 1',
                ))
            );
            $this->createIndex('branches_uq_name', '{{branches}}', 'name', true);
            $this->createIndex('branches_uq_address', '{{branches}}', 'address', true);
        }

        /**
         * Migrate: Down
         *
         * @access public
         * @return void
         */
        public function down()
        {
            $this->dropTable('{{branches}}');
        }

    }
