<?php

    class m130807_182718_user_branch extends CDbMigration
    {

        /**
         * Migrate: Up
         *
         * @access public
         * @return void
         */
        public function up()
        {
            $this->addColumn('{{users}}', 'branch', 'INT NOT NULL COMMENT "" AFTER ' . $this->getDbConnection()->quoteColumnName('password'));
            $this->addForeignKey('users_fk_branch', '{{users}}', 'branch', '{{branches}}', 'id');
        }

        /**
         * Migrate: Down
         *
         * @access public
         * @return void
         */
        public function down()
        {
            $this->dropForeignKey('users_fk_branch', '{{users}}');
            $this->dropColumn('{{users}}', 'branch');
        }

    }
