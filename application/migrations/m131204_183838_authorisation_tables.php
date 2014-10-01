<?php

    class m131204_183838_authorisation_tables extends CDbMigration
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
                '{{auth_items}}',
                array(
                    'id'            => 'pk                                          COMMENT ""',
                    'name'          => 'VARCHAR(64)     NOT NULL    UNIQUE          COMMENT ""',
                    'type'          => 'TINYINT         NOT NULL                    COMMENT ""',
                    'description'   => 'TEXT                                        COMMENT ""',
                    'rule'          => 'TEXT                                        COMMENT "The business rule governing this authorisation item."',
                    'data'          => 'TEXT                                        COMMENT "Any additional data to provide whilst evaluating the business rule."',
                    'default'       => 'BOOLEAN         NOT NULL    DEFAULT FALSE   COMMENT "Should this authorisation item be applied to all users by default?"',
                ),
                implode(' ', array(
                    'ENGINE          = InnoDB',
                    'DEFAULT CHARSET = utf8',
                    'COLLATE         = utf8_general_ci',
                    'COMMENT         = ""',
                    'AUTO_INCREMENT  = 1',
                ))
            );

            $this->createTable(
                '{{auth_hierarchy}}',
                array(
                    'parent'        => 'INT             NOT NULL                    COMMENT ""',
                    'child'         => 'INT             NOT NULL                    COMMENT ""',
                ),
                implode(' ', array(
                    'ENGINE          = InnoDB',
                    'DEFAULT CHARSET = utf8',
                    'COLLATE         = utf8_general_ci',
                    'COMMENT         = ""',
                    'AUTO_INCREMENT  = 1',
                ))
            );
            $this->addPrimaryKey('auth_hierarchy_pk_parent_child', '{{auth_hierarchy}}', 'parent, child');
            $this->addForeignKey('auth_hierarchy_fk_parent', '{{auth_hierarchy}}', 'parent', '{{auth_items}}', 'id');
            $this->addForeignKey('auth_hierarchy_fk_child', '{{auth_hierarchy}}', 'child', '{{auth_items}}', 'id');

            $this->createTable(
                '{{auth_assignments}}',
                array(
                    'item'          => 'INT             NOT NULL                    COMMENT ""',
                    'user'          => 'INT             NOT NULL                    COMMENT ""',
                    'rule'          => 'TEXT                                        COMMENT "The business rule governing this authorisation assignment."',
                    'data'          => 'TEXT                                        COMMENT "Any additional data to provide whilst evaluating the business rule."',
                ),
                implode(' ', array(
                    'ENGINE          = InnoDB',
                    'DEFAULT CHARSET = utf8',
                    'COLLATE         = utf8_general_ci',
                    'COMMENT         = ""',
                    'AUTO_INCREMENT  = 1',
                ))
            );
            $this->addPrimaryKey('auth_assignments_pk_item_user', '{{auth_assignments}}', 'item, user');
            $this->addForeignKey('auth_assignments_fk_item', '{{auth_assignments}}', 'item', '{{auth_items}}', 'id');
            $this->addForeignKey('auth_assignments_fk_user', '{{auth_assignments}}', 'user', '{{users}}', 'id');
        }

        /**
         * Migrate: Down
         *
         * @access public
         * @return void
         */
        public function down()
        {
            $this->dropTable('{{auth_assignments}}');
            $this->dropTable('{{auth_hierarchy}}');
            $this->dropTable('{{auth_items}}');
        }

    }
