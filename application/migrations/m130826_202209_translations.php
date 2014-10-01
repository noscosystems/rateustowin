<?php

    class m130826_202209_translations extends CDbMigration
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
                '{{messages}}',
                array(
                    'id'            => 'pk                                      COMMENT ""',
                    'category'      => 'VARCHAR(32)     NOT NULL                COMMENT ""',
                    'message'       => 'TEXT                                    COMMENT ""',
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
                '{{translations}}',
                array(
                    'id'            => 'INT             NOT NULL                COMMENT ""',
                    'language'      => 'VARCHAR(16)     NOT NULL                COMMENT ""',
                    'translation'   => 'TEXT            NOT NULL                COMMENT ""',
                ),
                implode(' ', array(
                    'ENGINE          = InnoDB',
                    'DEFAULT CHARSET = utf8',
                    'COLLATE         = utf8_general_ci',
                    'COMMENT         = ""',
                    'AUTO_INCREMENT  = 1',
                ))
            );
            $this->addPrimaryKey('translation_pk', '{{translations}}', 'id, language');
            $this->addForeignKey('translation_fk_id', '{{translations}}', 'id', '{{messages}}', 'id');
        }

        /**
         * Migrate: Down
         *
         * @access public
         * @return void
         */
        public function down()
        {
            $this->dropTable('{{translations}}');
            $this->dropTable('{{messages}}');
        }

    }
