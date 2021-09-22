<?php

namespace App;

    use League\Csv\Reader;
    use League\Csv\Statement;
    use League\Csv\TabularDataReader;

    class ReadData{

        private Reader $csv;

        public function __construct()
        {
            $this->csv = Reader::createFromPath('raditaji.csv', 'r');
            $this->csv->setHeaderOffset(0);
            $this->csv->setDelimiter(";");
        }

        public function getRecords() : TabularDataReader
        {
            return Statement::create()->process($this->csv);
        }

        public function setSearchResult($search): ?array
        {
            foreach ($this->getRecords() as $record)
            {
                if(in_array($search, $record))
                {
                    return $record;
                }
            }
            return null;
        }



    }



