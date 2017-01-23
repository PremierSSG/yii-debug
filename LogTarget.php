<?php

namespace premierssg\yii2\debug;

class LogTarget extends \yii\debug\LogTarget
{
    /**
     * @inheritdoc
     */
    public function export()
    {
        $path = $this->module->dataPath;
        FileHelper::createDirectory($path, $this->module->dirMode);

        $summary = $this->collectSummary();
        $dataFile = "$path/{$this->tag}.data";
        $data = [];
        foreach ($this->module->panels as $id => $panel) {
            $data[$id] = $panel->save();
        }
        if (isset($data['profiling']['time'])) {
            $summary['duration'] = $data['profiling']['time'];
        }
        $data['summary'] = $summary;
        file_put_contents($dataFile, serialize($data));
        if ($this->module->fileMode !== null) {
            @chmod($dataFile, $this->module->fileMode);
        }

        $indexFile = "$path/index.data";
        $this->updateIndexFile($indexFile, $summary);
    }

}
