<?php

namespace ignatenkovnikita\device\models\search;

use ignatenkovnikita\device\models\UserDevice;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * UserDeviceSearch represents the model behind the search form about `common\models\UserDevice`.
 */
class UserDeviceSearch extends UserDevice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'created_at', 'updated_at', 'author_id', 'updater_id'], 'integer'],
            [['uuid', 'json', 'token'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserDevice::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author_id' => $this->author_id,
            'updater_id' => $this->updater_id,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'json', $this->json])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}
