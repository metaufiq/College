using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class DrawLineAnswer : MonoBehaviour
{
    //lprivate LineRenderer lineRenderer;
    private float Counter;
    private float dist;
    //	public  Transform origin_1;
    //public  Transform destination_1;
    //GameObject vertex;
    private float lineDrawSpeed = 6f;
    private checkLine Peta;
    bool[,] cek = new bool[9, 9];
    private List<LineRenderer> render = new List<LineRenderer>();
    public GameObject Renderer;
    private GameObject temporary, temp1;
    bool[] isVisited = new bool[9]; //buat cek sudah divisit apa belum
    int[] cost = new int[9]; //simpan cost menuju vertex ke-i
    int[] parent = new int[9]; //simpan vertex ke-i dituju dari vertex parent[i]
    Prims_Algo Answer;

    // Use this for initialization
    void Start()
    {
        for (int i = 0; i < 9; i++)
        {
            for (int j = 0; j < 9; j++) cek[i, j] = false;
        }
        for (int i = 0; i < 9; i++) isVisited[i] = false;
        for (int i = 0; i < 9; i++) cost[i] = 1000000;
        for (int i = 0; i < 9; i++) parent[i] = -1;
        temporary = GameObject.Find("Main Camera");
        Peta = temporary.GetComponent<checkLine>();
        temp1 = GameObject.Find("Prims");
        Answer = temp1.GetComponent<Prims_Algo>();
        Prims();
    }

    // Update is called once per frame
    void Update()
    {
        
    }
    void Prims()
    {
        cost[Answer.root] = 0;
        for (int i = 0; i < 9; i++)
        {
            int best = 1000000;
            int idx = -1;
            for (int j = 0; j < 9; j++)
            {
                if (!isVisited[j] && cost[j] <= best)
                {
                    best = cost[j];
                    idx = j;
                }
            }
            if (best == 1000000) break;
            isVisited[idx] = true;
            for (int j = 0; j < 9; j++)
            {
                if (Peta.Graf[idx, j] != 0 && Peta.Graf[idx, j] < cost[j])
                {
                    if (!isVisited[j]) {
                        parent[j] = idx;
                        GameObject dataTemp = (GameObject)Instantiate(Renderer, gameObject.transform.position, gameObject.transform.rotation);
                        render.Add(dataTemp.GetComponent<LineRenderer>());
                        render[render.Count - 1].SetPosition(0, Peta.mapping[idx].transform.position);
                        render[render.Count - 1].SetWidth(3f, 3f);
                        render[render.Count - 1].SetPosition(1, Peta.mapping[j].transform.position);
                        System.Threading.Thread.Sleep(300);         //untuk kasih jeda
                    } 
                    cost[j] = Peta.Graf[idx, j];
                }
            }
        }
    }
}
