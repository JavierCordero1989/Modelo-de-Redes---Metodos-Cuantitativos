// const problem = {
//     start: { A: 5, B: 2 },
//     A: { start: 1, C: 4, D: 2 },
//     B: { A: 8, D: 7 },
//     C: { D: 6, finish: 3 },
//     D: { finish: 1 },
//     finish: {}
// };

// const problem = {
//     start: { b: 3, e: 6, f: 10 },
//     b: { c: 5, e: 2 },
//     c: { finish: 8, e: 9, f: 7 },
//     finish: { f: 4 },
//     e: { f: 4 }
// };


// problem = {
//     1: { 2: 3, 3: 8 },
//     2: { 4: 6, 5: 1 },
//     3: { 4: 2, 7: 8 },
//     4: { 5: 4, 6: 4, 7: 4 },
//     5: { 6: 2, 8: 3, 10: 6 },
//     6: { 7: 7, 8: 7, 9: 8 },
//     7: { 9: 3 },
//     8: { 10: 2 },
//     9: { 10: 6 },
//     10: {}
// };

problem = conexionesNuevas_json;

function log(message) {
    const logging = false;
    if (logging) {
        console.log(message);
    }
}

const lowestCostNode = (costs, processed) => {
    return Object.keys(costs).reduce((lowest, node) => {
        if (lowest === null || costs[node] < costs[lowest]) {
            if (!processed.includes(node)) {
                lowest = node;
            }
        }
        return lowest;
    }, null);
};

const dijkstra = (graph, startNodeName, endNodeName) => {

    // track the lowest cost to reach each node
    let costs = {};
    costs[endNodeName] = "Infinity";
    costs = Object.assign(costs, graph[startNodeName]);

    // track paths
    const parents = { endNodeName: null };
    for (let child in graph[startNodeName]) {
        parents[child] = startNodeName;
    }

    // track nodes that have already been processed
    const processed = [];

    let node = lowestCostNode(costs, processed);

    while (node) {
        let cost = costs[node];
        let children = graph[node];
        for (let n in children) {
            if (String(n) === String(startNodeName)) {
                log("WE DON'T GO BACK TO START");
            } else {
                log("StartNodeName: " + startNodeName);
                log("Evaluating cost to node " + n + " (looking from node " + node + ")");
                log("Last Cost: " + costs[n]);
                let newCost = cost + children[n];
                log("New Cost: " + newCost);
                if (!costs[n] || costs[n] > newCost) {
                    costs[n] = newCost;
                    parents[n] = node;
                    log("Updated cost und parents");
                } else {
                    log("A shorter path already exists");
                }
            }
        }
        processed.push(node);
        node = lowestCostNode(costs, processed);
    }

    let optimalPath = [endNodeName];
    let parent = parents[endNodeName];
    while (parent) {
        optimalPath.push(parent);
        parent = parents[parent];
    }
    optimalPath.reverse();

    const results = {
        distance: costs[endNodeName],
        path: optimalPath
    };

    return results;
};