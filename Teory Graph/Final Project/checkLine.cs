using UnityEngine;
using System.Collections;

public class checkLine : MonoBehaviour {
    //GameObject lineMakerForPlayer1_1;
    //DrawLine connect_1;
    //DrawLine Gariz;
    //GameObject bombPlayer1_1;
    //Bomb1 bombPlayer1_1Script;

    //GameObject bombPlayer1_2;
    //Bomb2 bombPlayer1_2Script;
    public Transform[] posisi = new Transform[9];
    public GameObject[] mapping = new GameObject[9];
    public int[,] Graf = new int[9, 9];
	//public int lineCount = 0;
	public int[] checkVertex = new int[10];
	private int begin = 0;
	private int end = 0;
	private int countBond=0;

	//// Use this for initialization
	void Start () {
        //	lineMakerForPlayer1_1 = GameObject.Find ("LineRendererForPlayer1(1)");
        //	connect_1 = lineMakerForPlayer1_1.GetComponent<DrawLine> ();

        //	bombPlayer1_1 = GameObject.Find ("Dynamite_player1(1)");
        //	bombPlayer1_1Script = bombPlayer1_1.GetComponent<Bomb1> ();

        //	bombPlayer1_2 = GameObject.Find ("Dynamite_player1(2)");
        //	bombPlayer1_2Script = bombPlayer1_2.GetComponent<Bomb2> ();
        mapping[0] = GameObject.Find("Dynamite_player1(1)");
        //v[0]=mapping[0].ge
        mapping[1] = GameObject.Find("Dynamite_player1(2)");
        mapping[2] = GameObject.Find("Dynamite_player1(3)");
        mapping[3] = GameObject.Find("Dynamite_player1(4)");
        mapping[4] = GameObject.Find("Dynamite_player1(5)");
        mapping[5] = GameObject.Find("Dynamite_player1(6)");
        mapping[6] = GameObject.Find("Dynamite_player1(7)");
        mapping[7] = GameObject.Find("Dynamite_player1(8)");
        mapping[8] = GameObject.Find("Dynamite_player1 (9)");

        for(int i = 0; i < 9; i++)
            for(int j = 0; j < 9; j++) Graf[i, j] = 0; 
        
    }
	
	//// Update is called once per frame
	void Update () {

        //	//mengecek apakah terjadi ikatan
        for (int i = 0; i < mapping.Length; i++)
        {
            //Debug.Log("count" + countBond);
            //Debug.Log("cek"+checkVertex[i + 1]);
            if (checkVertex[i + 1] != 0)
            {
                countBond++;
                if (countBond == 1)
                {
                    begin = i;
                    checkVertex[i + 1] = 0;
                }
                else
                {
                    end = i;
                    checkVertex[i + 1] = 0;
                    if (begin != end && Graf[begin, end] == 0)
                    {
                        Graf[begin, end] = Random.Range(5, 15);
                        Graf[end, begin] = Graf[begin, end];
                        Debug.Log("from " + (begin + 1) + " to " + (end + 1) + " " + Graf[begin, end]);
                    }
                    countBond = 0;
                    break;
                }
            }
        }
	//	for (int i = 1; i <= 9; i++) {
	//		if (checkVertex [i] != 0) {
	//			countBond++;
	//			if (countBond == 1) {
	//				begin = i;
	//				checkVertex [i] = 0;
	//				connect_1.origin_1 = bombPlayer1_1.GetComponent<Transform> ();
	//			} else {
				
	//				end = i;
	//				if (begin == 1) {
	//					if (end == 2) {
	//						connect_1.destination_1 = bombPlayer1_2.GetComponent<Transform> ();
	//					}
	//					if (end == 3) {
	//						//connect_1.destination_1 = bombPlayer1_3.GetComponent<Transform> ();
	//					}
	//					if (end == 4) {
	//						//connect_1.destination_1 = bombPlayer1_4.GetComponent<Transform> ();
	//					}
	//					if (end == 5) {
	//						//connect_1.destination_1 = bombPlayer1_5.GetComponent<Transform> ();
	//					}
	//					if (end == 6) {
	//						//connect_1.destination_1 = bombPlayer1_6.GetComponent<Transform> ();
	//					}
	//					if (end == 7) {
	//						//connect_1.destination_1 = bombPlayer1_7.GetComponent<Transform> ();
	//					}
	//					if (end == 8) {
	//					}
	//					if (end == 9) {
	//					}
	//				}
	//				if (begin == 2) {
	//				}
	//				if (begin == 3) {
	//				}
	//				if (begin == 4) {
	//				}
	//				if (begin == 5) {
	//				}
	//				if (begin == 6) {
	//				}
	//				if (begin == 7) {
	//				}
	//				if (begin == 8) {
	//				}
	//				if (begin == 9) {
	//				}

	//				checkVertex [i] = 0;
	//				countBond -= 2;
	//				break;
	//			}

	//		}//end if statement

	//	}//end for statement
	}
}
