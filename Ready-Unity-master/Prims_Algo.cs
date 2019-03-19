using UnityEngine;
using System.Collections;

public class Prims_Algo : MonoBehaviour {
    checkLine Peeta;
    private GameObject temporary;
    public int[,] newPrims = new int[9, 9]; //buat simpan adjacency matrix hasil prims
    bool[] isVisited = new bool[9]; //buat cek sudah divisit apa belum
    int[] cost = new int[9]; //simpan cost menuju vertex ke-i
    int[] parent = new int[9]; //simpan vertex ke-i dituju dari vertex parent[i]
    public int root; //diakses di gameplay, waktu pilih root
    // Use this for initialization
    void Start () {
        temporary = GameObject.Find("Main Camera");
        Peeta = temporary.GetComponent<checkLine>();
        for (int i = 0; i < 9; i++)
            for (int j = 0; j < 9; j++) newPrims[i, j] = 0;
        for (int i = 0; i < 9; i++) isVisited[i] = false;
        for (int i = 0; i < 9; i++) cost[i] = 1000000;
        for (int i = 0; i < 9; i++) parent[i] = -1;
        Prims();
    }
	
	// Update is called once per frame
	void Update () {
	
	}

    public void Prims()
    {
        cost[root] = 0;
        for(int i = 0; i < 9; i++)
        {
            int best = 1000000;
            int idx = -1;
            for(int j = 0; j < 9; j++)
            {
                if(!isVisited[j] && cost[j] <= best)
                {
                    best = cost[j];
                    idx = j;
                }
            }
            if (best == 1000000) break;
            isVisited[idx] = true;
            for(int j = 0; j < 9; j++)
            {
                if (Peeta.Graf[idx,j] != 0 && Peeta.Graf[idx, j] < cost[j])
                {
                    if (!isVisited[j]) parent[j] = idx;
                    cost[j] = Peeta.Graf[idx, j];
                }
            }
        }
        for(int i = 0; i < 9; i++)
        {
            for(int j = 0; j < 9; j++)
            {
                if (parent[j] == i || parent[i] == j) newPrims[i, j] = Peeta.Graf[i, j];
                else newPrims[i, j] = 0;
            }
        }
    }
}
//System.Threading.Thread.Sleep(200);